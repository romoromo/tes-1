<?php

class KeringananstpdController extends Controller
{
	public function actionIndex()
	{
				
		$this->renderPartial('index');
	}
	public function actionCari()
	{
		
		$this->renderPartial('cari');
	}

	public function actionAutocompletePegawai()
	{
		
		$this->renderPartial('autocomplete');
	}
	
	}