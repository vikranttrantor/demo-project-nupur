<html>
  <head>
  <meta name="viewport" content = "width = device-width, initial-scale = 1.0, minimum-scale = 1, maximum-scale = 1.0 , user-scalable = no"/>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
  <style>
      .deviceWidth{width:600px;color: rgb(56, 56, 56);}
      img{max-width:100%; }
      .semiWidth{width:70%;}

      @media (max-width:600px)  {
        table.deviceWidth{width:95% ;}
        table.semiWidth{width:100% ;}  
      }
      
    </style>
  </head>
  <body style="background:rgb(230, 230, 230);font-size:13px;color: rgb(56, 56, 56);">
    <table cellspacing="0"  cellpadding="0" class="deviceWidth" style="margin:0px auto; 
    font-size:14px;font-family: Arial, Helvetica, sans-serif;background:#fff; border:1px solid #ccc; border-radius:5px; " >
      <tbody>
        <tr>
           <td colspan="2" style="border-radius:5px 5px 0px 0px;background:#053a6e; padding:20px">
            <?= $this->Html->image('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR4FJ1WvxRTytWPcHtDb1-GypkYZy5fwoZmfU6wk1ZPKv97qKgg', array('alt' => 'CakePHP', 'height'=>'50','width'=>'50')) ?> </td>
        </tr>   
        <br>
          <tr>
           Hi <?= $name ?>
        </tr>
        <tr>
           <?= $message ?>
        </tr>

        <tr>
          <td>
              <p style="margin-top:20px;line-height:125%;">Thanks, <br><?= $instituteName ?><br><?= $adminEmail ?>
              </p>
                    
          </td>
        </tr>   
    </tbody>
  </table>
      
         <!--Header ends and body starts-->
      
  </body>
<html>