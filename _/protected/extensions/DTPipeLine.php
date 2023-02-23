<?php 
	/**
	* written by : Suryo Prasetyo W <the.oyrus@gmail.com>
	* description : Extension untuk menggenerate JSON DataTables Pipeline
	* 
	*/
	class DTPipeLine extends CApplicationComponent
	{
		var $iDisplayStart;
		var $iDisplayLength;
		var $sSortDir_0;
		var $sSearch;
		var $sEcho;
		var $useJSONHeader = false;

		public static function generateJSON($arrParam=array())
		{
			/*variable initialization*/
			$search = "";
			$start = 0;
			$rows = 10;

			extract($arrParam);
			$useJSONHeader = (isset($useJSONHeader) && $useJSONHeader) ? true : false;

			/*get search value (if any)*/
			$search = self::getSearch();

			/*limit*/
			$start = self::getStart();
			$rows = self::getRows();

			/*sort*/
			// $sort_dir = self::getSortDir();

			//$DATA_FETCHED = self::user_model->user_listing($start, $rows, $search, self::getSort(), $sort_dir);
			$iFilteredTotal = $TOTAL_FILTERED_RECORDS; //dari extract array

			// $iTotal = self::user_model->user_listing(0, '-1', '', '', '')->num_rows();
			$iTotal = $TOTAL_RECORDS; //dari extract array

			/*
			 * Output
			 */
			$output = array(
				"draw" => isset($_REQUEST['draw']) ? intval($_REQUEST['draw']) : 0,
				"recordsTotal" => $iTotal,
				"recordsFiltered" => $iFilteredTotal,
				"data" => array()
				);

			// get result after running query and put it in array
			// $DATA_FETCHED dari extract array
			foreach ($DATA_FETCHED as $row) {
				$record = $row;
				if( isset($COLUMN_AS_KEY) && !$COLUMN_AS_KEY) {
					// default, gunakan nama kolom sbg key data json
					// jika tidak maka gunakan urutan angka 0 - dst sbg key
					$record = array();
					foreach ($row as $key => $value) {
						$record[] = $row[$key];			
					}					
				}

				$output['data'][] = $record;
			}
			// format it to JSON, this output will be displayed in datatable
			if($useJSONHeader) {
				header('Content-type: text/json');
				header('Content-type: application/json');
			}
			return json_encode($output);
		}

		public static function getStart() {
			$start = 0;
			if (isset($_REQUEST['start'])) {
				$start = intval($_REQUEST['start']);

				if ($start < 0)
					$start = 0;
			}

			return $start;
		}

		public static function getRows() {
			$rows = 10;
			if (isset($_REQUEST['length'])) {
				$rows = intval($_REQUEST['length']);
				/*if ($rows < 5 || $rows > 500) {
					$rows = 10;
				}*/
			}

			return $rows;
		}

		public static function getSortDir() {
			$sort_dir = "ASC";
			$sdir = strip_tags($_REQUEST['sSortDir_0']);
			if (isset($sdir)) {
				if ($sdir != "asc" ) {
					$sort_dir = "DESC";
				}
			}

			return $sort_dir;
		}

		public static function getSort() {
			$sCol = $_REQUEST['iSortCol_0'];
			$col = 0;
			// $cols = array( "username", "username", "firstName", "email1", "active" );
			$cols = $cols;

			if (isset($sCol)) {
				$col = intval($sCol);
				if ($col < 0 || $col > 4)
					$col = 0;
			}
			$colName = $cols[$col];

			return $colName;
		}

		public static function getSearch()
		{
			$search = '';
			if (isset($_REQUEST['search']['value']) && $_REQUEST['search']['value'] != "" ) {
				$search = $_REQUEST['search']['value'];
			}
			return trim($search);
		}

		/**
		 * Pull a particular property from each assoc. array in a numeric array, 
		 * returning and array of the property values from each item.
		 *
		 *  @param  array  $a    Array to get data from
		 *  @param  string $prop Property to read
		 *  @return array        Array of property values
		 */
		static function pluck( $a, $prop )
		{
			$out = array();

			for ( $i=0, $len=count($a) ; $i<$len ; $i++ ) {
				$out[] = $a[$i][$prop];
			}

			return $out;
		}

		/**
		 * Ordering
		 *
		 * Construct the ORDER BY clause for server-side processing SQL query
		 *
		 *  @param  array $request Data sent to server by DataTables
		 *  @param  array $columns Column information array
		 *  @return string SQL order by clause
		 */
		static function getOrder()
		{
			$order = '';
			$request = $_REQUEST;
			$columns = $_REQUEST['columns'];

			if ( isset($request['order']) && count($request['order']) ) {
				$orderBy = array();
				$dtColumns = self::pluck( $columns, 'data' );

				for ( $i=0, $ien=count($request['order']) ; $i<$ien ; $i++ ) {
					// Convert the column index into the column data property
					$columnIdx = intval($request['order'][$i]['column']);
					$requestColumn = $request['columns'][$columnIdx];

					$columnIdx = array_search( $requestColumn['data'], $dtColumns );
					$column = $columns[ $columnIdx ];

					if ( $requestColumn['orderable'] == 'true' ) {
						$dir = $request['order'][$i]['dir'] === 'asc' ?
							'ASC' :
							'DESC';

						$orderBy[] = ''.$column['data'].' '.$dir;
					}
				}

				$order = ' '.implode(', ', $orderBy);
			}

			return $order;
		}

		public function getFoundRows($db=null)
		{
			if($db==null) {
				$db = Yii::app()->db;
			}
			$return_found = $db->createCommand( 'SELECT FOUND_ROWS()' )->queryRow();
			var_dump($return_found);
			return $return_found;
		}
	}