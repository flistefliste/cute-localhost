<?php
// Set your own $root_path
$root_path = '/Users/vincent/Documents/Web/';
// Set directories or files you want to ignore
$ignore = array('.DS_Store','.','..');

$elements = scandir($root_path);

function fresh_work($last_modified){
    $today = new DateTime('now');
    $last_modified = new DateTime($last_modified);
    $interval = $today->diff($last_modified);
    $interval =  $interval->format('%a');
    if($interval <=7) echo '<i class="red icon fire" title="Fresh work !"></i>';
    echo $interval. ' days ago' ;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Cute Localhost</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/semantic-ui/0.16.1/css/semantic.min.css">
       <link rel="stylesheet" src="//normalize-css.googlecode.com/svn/trunk/normalize.css" />
        <link rel="stylesheet" href="//cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css">
        <style type="text/css">
            body{font-family : sans-serif;color : teal ;}
            *{box-sizing:border-box;}
            a,i{color :gray;text-decoration: none}
            a{display :block;}
            tr td:first-child a{color :teal;}
            tr:hover td{background :teal;}
            tr:hover td a{color:white;}
        </style>
    </head>
    <body>
        
        <div class="ui two column divided grid">
          <div class="row">
            <div class="column">
                <h2 class="ui header"><i class="open folder icon"></i>Directories</h2>
              
                <table class="list ui table segment">
                  <thead>
                    <tr>
                        <th>Directory name</th>
                        <th>Last modified</th>
                   
                    </tr>
                </thead>
                  <tbody>
                    <?php
                    foreach($elements as $el){
                        if(!is_file($el) && !in_array($el,$ignore)){
                            echo '<tr>'."\n";
                                echo '<td>'."\n";
                                    echo '<a href="'.$el.'">'.$el.'</a>'."\n" ;  
                                echo '</td>'."\n";
                                echo '<td>'."\n";
                                    $stat = stat($el);
                                    echo '<a href="'.$el.'">';
                                        fresh_work(date('Y-m-d', $stat['atime']));
                                    echo '</a>'."\n";
                                echo '</td>'."\n";
                            echo '</tr>'."\n";
                        }
                    }
                    ?>
                
                 </tbody>
                </table>
            </div>


             <div class="column">
                <h2 class="ui header"><i class="file icon"></i>Files</h2>
                <table class="list ui table segment">
                  <thead>
                    <tr>
                        <th>File name</th>
                         <th>Last modified</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    foreach($elements as $el){
                        if(is_file($el) && !in_array($el,$ignore)){
                            echo '<tr>';
                                echo '<td>';
                                    echo '<a href="'.$el.'">'.$el.'</a>' ;  
                                echo '</td>';
                                echo '<td>';
                                    $stat = stat($el);
                                   echo '<a href="'.$el.'">';
                                   echo  fresh_work(date('Y-m-d', $stat['mtime']));
                                   echo '</a>';
                                echo '</td>';
                            echo '</tr>';
                        }
                        
                    }
                    ?>
                
                 </tbody>
                 </table>
            </div>
          </div>
        </div>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src="//cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
        <script>
           $(document).ready(function(){
                $('.list').dataTable({
                     "paging":   false,
                     "ordering": false,
                     "info":     false
                });


            });

           $(window).on('load',function(){
              $('input[type=search]:first').focus();
           });
        </script>

       
    </body>
</html>
