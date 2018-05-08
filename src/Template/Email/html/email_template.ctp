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
            <?= $this->Html->image('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR4FJ1WvxRTytWPcHtDb1-GypkYZy5fwoZmfU6wk1ZPKv97qKgg', array('alt' => 'CakePHP', 'height'=>'50','width'=>'50')) ?>
          
</tr>   
    
      
         <!--Header ends and body starts-->
        <tr>
          <td colspan="2">
            <table width="100%" style="padding:15px 20px;font-size:14px;font-family: Arial, Helvetica, sans-serif;line-height:125%; color: rgb(56, 56, 56);">
              <tbody>
                <tr>
                  <td>

                    <p style="line-height:125%;font-size:24px; font-weight:bold; margin-bottom:0px;color:#0857a4;">Welcome to ABC Institute </p>
                      
                  </td>
                </tr>
                <tr>
                  <td>
                      <p style="font-style:italic; margin-top:15px;line-height:125%; color: rgb(56, 56, 56);">Hi <?= $name ?>,</p> 
                      <p style="margin-top:10px;line-height:150%; color: rgb(56, 56, 56);">Thank you for registering with ABC Institute. Your account is created with us.
                      </p>   
                                    
                  </td>
                </tr>

                
                <tr>
                  <td>
                      <p style="margin-top:10px;line-height: 125%; color: rgb(56, 56, 56);">Please Login to our site using following credentials for more details: </p>
                      <p style="margin-top:10px;line-height: 125%; color: rgb(56, 56, 56);">Username: <?= $name ?></p>
                      <p style="margin-top:10px;line-height: 125%; color: rgb(56, 56, 56);">Password: <?= $password ?> </p>
                                    
                  </td>
                </tr>


                <tr>
                  <td><p style="margin-top:10px;line-height: 125%; color: rgb(56, 56, 56);">Following are your course specifications:</p>
                      <p style="margin-top:10px;line-height: 125%; color: rgb(56, 56, 56);">Course Name: <?= $courseName ?></p>
                      <p style="margin-top:10px;line-height: 125%; color: rgb(56, 56, 56);">Duration: <?= $duration ?> months </p>
                      <p style="margin-top:10px;line-height: 125%; color: rgb(56, 56, 56);">Course Fee: <?= $courseFee ?> </p>
                                    
                  </td>
                </tr>
              

                <tr>
                  <td>
                      <p style="margin-top:10px;line-height: 125%; color: rgb(56, 56, 56);"><strong>*Never share your login details with anyone.</strong> </p>
                                    
                  </td>
                </tr>
                <!--greetings ends and body starts-->
                
                
           <tr>
                  <td>
                    <p style="margin-top:20px;line-height:125%;">Thanks, <br>ABC Team
                    </p>
                    
                  </td>
           </tr>     
                
                
        
      </tbody>
      
      


    </table>    
  </body>
<html>