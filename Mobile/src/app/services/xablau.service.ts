import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class XablauService {

	apiURL: string = 'http://localhost:8000/api/'
  constructor(public http: HttpClient) { }

	getXablau(id:number): Observable<any>{
		return this.http.get(this.apiURL + 'xablau/' + id);
	}

	getXablaus(): Observable<any>{
		return this.http.get(this.apiURL + 'xablau');
	}

	getXablauByDate(month:number,year:number){
		return this.http.get(this.apiURL + 'xablau/' + month + '/' + year);
	}

}
