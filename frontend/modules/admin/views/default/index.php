<?use yii\helpers\Url; ?>
<div class="admin-default-index">
    <h1><?= $this->context->action->uniqueId ?></h1>
    <p>
        This is the view content for action "<?= $this->context->action->id ?>".
        The action belongs to the controller "<?= get_class($this->context) ?>"
        in the "<?= $this->context->module->id ?>" module.
    </p>
    <p>
        You may customize this page by editing the following file:<br>
        <code><?= __FILE__ ?></code>
    </p>
</div>

<?php
//echo Yii::getAlias('@web');
//echo Url::to('http://localhost:120/advanced_3/frontend/web/');
//echo Yii::getPathOfAlias('webroot');
//echo Yii::setAlias('frontend');

//echo Yii::getAlias('@app');

echo Yii::getAlias('@uploads');
$str=Yii::getAlias('@app').'\web\file\ 2.txt';
$srt3="D:\\OpenServer\\OpenServer\\domains\\localhost\\advanced_3\\frontend\\web\\документы\\2.txt";
//"D:\\OpenServer\\OpenServer\\domains\\localhost\\advanced_3\\frontend\\modules\\admin\\views\\default\\ar2.txt"
//"D:\\OpenServer\\OpenServer\\domains\\localhost\\advanced_3\\frontend\\web\\file\\ar2.txt"
echo $str;
echo $srt3;

//$f = fopen("D:\\OpenServer\\OpenServer\\domains\\localhost\\advanced_3\\frontend\\web\\file\\g2.txt", "r");
//$f = fopen("D:\\OpenServer\\OpenServer\\domains\\localhost\\advanced_3\\frontend\\web\\file\\id3.xml", "r");
//$f = fopen("D:\\OpenServer\\OpenServer\\domains\\localhost\\advanced_3\\frontend\\web\\file\\id.pdf", "r");
	// Читать построчно до конца файла
   /* $str=array();
	while(!feof($f)) { 
	   echo fgets($f) . "<br />";
        
        // $slider=explode("	", fgets($f));  
       //  $str[]=$slider;
    
	}
  

	fclose($f); 
     echo 'str'. "<br />";
           echo print_r($str);
           
           */
     
     //>>>>>>>>>>>чтение XML <<<<<<<<<<<<<<
     $xmlfile="D:\\OpenServer\\OpenServer\\domains\\localhost\\advanced_3\\frontend\\web\\file\\Goods2.xml";
      $xmlfile2=Yii::getAlias('@uploads')."Goods2.xml";
     $xml = simplexml_load_file($xmlfile2);

//var_dump($xml);
// echo print_r($xml);
echo '<br /><br /><br />';
foreach($xml as $key)

{
//echo $xml->Код;
echo $key->id.'<br />';
echo $key->short_description.'-'.'<br />';
echo '___________<br />';
}
 

//echo $param->img.'<br />';

 



     
           
	
?>