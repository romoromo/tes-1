<?php

class ModuleCode extends CCodeModel
{
	public $moduleID;

	public function rules()
	{
		return array_merge(parent::rules(), array(
			array('moduleID', 'filter', 'filter'=>'trim'),
			array('moduleID', 'required'),
			array('moduleID', 'match', 'pattern'=>'/^(\w|\.)+$/', 'message'=>'{attribute} should only contain word characters.'),
		));
	}

	public function attributeLabels()
	{
		return array_merge(parent::attributeLabels(), array(
			'moduleID'=>'Module ID',
		));
	}

	public function successMessage()
	{
		if(Yii::app()->hasModule($this->moduleID))
			return 'The module has been generated successfully. You may '.CHtml::link('try it now', Yii::app()->createUrl($this->moduleID), array('target'=>'_blank')).'.';

		$output=<<<EOD
<p>The module has been generated successfully.</p>
<p>To access the module, you need to modify the application configuration as follows:</p>
EOD;
		$code=<<<EOD
<?php
return array(
    array(
    'modules'=>array(
        '{$this->moduleID}',
    ),
    ......
);
EOD;

		return $output.highlight_string($code,true);
	}

	public function prepare()
	{
		$this->files=array();
		$templatePath=$this->templatePath;
		$modulePath=$this->modulePath;
		$moduleTemplateFile=$templatePath.DIRECTORY_SEPARATOR.'module.php';

		$this->files[]=new CCodeFile(
			$modulePath.'/'.$this->moduleClass.'.php',
			$this->render($moduleTemplateFile)
		);

		$files=CFileHelper::findFiles($templatePath,array(
			'exclude'=>array('.svn'),
		));

		foreach($files as $file)
		{
			if($file!==$moduleTemplateFile)
			{
				if(CFileHelper::getExtension($file)==='php')
					$content=$this->render($file);
				else if(basename($file)==='.yii')  // an empty directory
				{
					$file=dirname($file);
					$content=null;
				}
				else
					$content=file_get_contents($file);
				$this->files[]=new CCodeFile(
					$modulePath.substr($file,strlen($templatePath)),
					$content
				);
			}
		}
	}

	public function getModuleClass()
	{
	   $dotPos=strpos($this->moduleID,".")>0 ? strrpos($this->moduleID,".")+1 : strpos($this->moduleID,".");
		return ucfirst(substr($this->moduleID,$dotPos)).'Module';
	}
	public function getModulePath()
	{
	   return Yii::app()->basePath.$this->getModuleRelativePath();
	}
    public function getModuleRelativePath(){
        $modulesFolder=substr(Yii::app()->modulePath,strrpos(Yii::app()->modulePath,DIRECTORY_SEPARATOR)+1);
        foreach(explode(".",$this->moduleID) as $module){
            @$path.=DIRECTORY_SEPARATOR.$modulesFolder.DIRECTORY_SEPARATOR.$module;
        }
        return $path;
    }
}
