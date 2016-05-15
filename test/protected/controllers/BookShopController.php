<?php

class BookShopController extends CController{
	
	public function actions(){
		return array(
				'service' => array(
					'class' => 'CWebServiceAction'
					)
			);
	}
	
	/** 
	 * @author string автор книги
	 * @return string список книг, отбор по автору и со-автору
	 * @soap
	 */
	public function getBooksByAuthor($author){
		//возвращает список книг
		return BookShop::model()->findAll(array('author'=>$author));
	}
	
	/**
	 * @title string автор книги
	 * @return array [] список книг, отбор по названию
	 * @soap
	 */
	public function getBooksByTitle($title){
		//возвращает список книг
		return BookShop::model()->findAll(array('title'=>$title));
	}
	
}