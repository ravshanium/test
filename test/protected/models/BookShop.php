<?php

class BookShop extends CActiveRecord{
	
	/**
	 *  mixed the AR objects populated with the query result
	 */
	private $defaultBookShop;
	
	/**
	 * Constructor.
	 * @param string $scenario scenario name. See {@link CModel::scenario} for more details about this parameter.
	 * Note: in order to setup initial model parameters use {@link init()} or {@link afterConstruct()}.
	 * Do NOT override the constructor unless it is absolutely necessary!
	 */
	public function __construct(){
		parent::__construct(null);
		
	}
	
	/*
	 * This method is mainly internally used by other AR query methods.
	 * @param CDbCriteria $criteria the query criteria
	 * @param boolean $all whether to return all data
	 * @return mixed the AR objects populated with the query result
	 * @since 1.1.7 
	 */
	protected function query($criteria, $all){
		
		$result = array(array('authors' 	=> 'Беляев А, Некрасов Н.И., Толстой Л.Н.', 
							  'title'   	=> 'Книга всех книг',
							  'description'	=> 'Вымышленная книга для тестирования приложения',
							  'book_id'	    => 'r107806'
								)
					);
		
		$this->beforeFind();
		$this->applyScopes($criteria);
		return $result;
	}
}