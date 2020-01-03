import { Component } from '@angular/core';
import { BookService } from '../services/book.service';

@Component({
  selector: 'app-tab1',
  templateUrl: 'tab1.page.html',
  styleUrls: ['tab1.page.scss']
})
export class Tab1Page {

	books:Array<any>;

  constructor(public book: BookService) {
		this.getBooks();
	}
	
	getBooks(){
		this.book.getBooks().subscribe( (res) => {
			this.books = res.data;
		} );
	}
}
