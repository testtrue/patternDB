<?php

/**
 * Description of Setup
 * Inspired by http://stackoverflow.com/questions/147821/loading-sql-files-from-within-php
 * @author bjoern.bass@esfl.de
 */
class Setup {
    private $config;

    public function __construct($config)
    {
        $this->config = $config;
    }

    /** createTablesFromFile
     * 
     * @param string $sqlFile
     */
    public function createTablesFromFile($sqlFile)
    {
        $sql = @fread(@fopen($sqlFile, 'r'), @filesize($sqlFile)) or die('Error in <br/>Method: '.__METHOD__.'<br/> File: '.__FILE__.' <br/>Line: '.__LINE__);
        $sql = $this->removeComments($sql);
        $sql = $this->splitSqlFile($sql, ';');
        
        $mysqli = new mysqli($this->config['dbhost'], $this->config['dbuser'], $this->config['dbpassword'], $this->config['dbname']);
        if ($mysqli->connect_errno)
        {
            die("Error connecting to database: " . $mysqli->connect_error);
        }

        foreach ($sql as $sql)
        {
            $mysqli->query($sql) or die('Error in query (Do the tables already exist? -> Drop them first!)<br/>Method: '.__METHOD__.'<br/> File: '.__FILE__.' <br/>Line: '.__LINE__);
        }
    }

    /** removeComments
     * removeComments will strip the sql comment lines out of an uploaded sql file.
     */
    private function removeComments($sql)
    {
        $lines = explode("\n", $sql);

// try to keep mem. use down
        $sql = "";
        $linecount = count($lines);
        $output = "";

        for ($i = 0; $i < $linecount; $i++)
        {
            if (($i != ($linecount - 1)) || (strlen($lines[$i]) > 0))
            {
                if (isset($lines[$i][0]) && $lines[$i][0] != "#")
                {
                    $output .= $lines[$i] . "\n";
                } else
                {
                    $output .= "\n";
                }
// Trading a bit of speed for lower mem. use here.
                $lines[$i] = "";
            }
        }

        return $output;
    }

    private function splitSqlFile($sql, $delimiter)
    {
// Split up our string into "possible" SQL statements.
        $tokens = explode($delimiter, $sql);

// try to save mem.
        $sql = "";
        $output = array();

// we don't actually care about the matches preg gives us.
        $matches = array();

// this is faster than calling count($oktens) every time thru the loop.
        $token_count = count($tokens);
        for ($i = 0; $i < $token_count; $i++)
        {
// Don't wanna add an empty string as the last thing in the array.
            if (($i != ($token_count - 1)) || (strlen($tokens[$i] > 0)))
            {
// This is the total number of single quotes in the token.
                $total_quotes = preg_match_all("/'/", $tokens[$i], $matches);
// Counts single quotes that are preceded by an odd number of backslashes,
// which means they're escaped quotes.
                $escaped_quotes = preg_match_all("/(?<!\\\\)(\\\\\\\\)*\\\\'/", $tokens[$i], $matches);
                $unescaped_quotes = $total_quotes - $escaped_quotes;

// If the number of unescaped quotes is even, then the delimiter did NOT occur inside a string literal.
                if (($unescaped_quotes % 2) == 0)
                {
// It's a complete sql statement.
                    $output[] = $tokens[$i];
// save memory.
                    $tokens[$i] = "";
                } else
                {
// incomplete sql statement. keep adding tokens until we have a complete one.
// $temp will hold what we have so far.
                    $temp = $tokens[$i] . $delimiter;
// save memory..
                    $tokens[$i] = "";

// Do we have a complete statement yet?
                    $complete_stmt = false;

                    for ($j = $i + 1; (!$complete_stmt && ($j < $token_count)); $j++)
                    {
// This is the total number of single quotes in the token.
                        $total_quotes = preg_match_all("/'/", $tokens[$j], $matches);
// Counts single quotes that are preceded by an odd number of backslashes,
// which means they're escaped quotes.
                        $escaped_quotes = preg_match_all("/(?&lt;!\\\\)(\\\\\\\\)*\\\\'/", $tokens[$j], $matches);
                        $unescaped_quotes = $total_quotes - $escaped_quotes;

                        if (($unescaped_quotes % 2) == 1)
                        {
// odd number of unescaped quotes. In combination with the previous incomplete
// statement(s), we now have a complete statement. (2 odds always make an even)
                            $output[] = $temp . $tokens[$j];
// save memory.
                            $tokens[$j] = "";
                            $temp = "";
// exit the loop.
                            $complete_stmt = true;
// make sure the outer loop continues at the right point.
                            $i = $j;
                        } else
                        {
// even number of unescaped quotes. We still don't have a complete statement.
// (1 odd and 1 even always make an odd)
                            $temp .= $tokens[$j] . $delimiter;
// save memory.
                            $tokens[$j] = "";
                        }
                    }
                }
            }
        }
        return $output;
    }
}
