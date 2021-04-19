<?php
             $url="http://newsapi.org/v2/everything?q=bitcoin&from=2020-09-30&sortBy=publishedAt&apiKey=0c0038bd0f2d4b228870dbd7b437807a";
             $response= file_get_contents($url);
             $news= json_decode($response);
            //  while($row=$news):
            //     echo $row;
            
            //  endwhile;
            print_r($news);
            ?>