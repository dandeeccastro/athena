import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class BookService {

	apiURL:string = 'http://localhost:8000/api/'
  constructor(public http: HttpClient) { }

	getBooks():Observable<any>{
		return this.http.get(this.apiURL + 'book');
	}
	getBook(id:number):Observable<any>{
		return this.http.get(this.apiURL + 'book/' + id);
	}
}
