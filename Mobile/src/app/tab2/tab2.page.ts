import { Component } from '@angular/core';
import { XablauService } from '../services/xablau.service';

@Component({
  selector: 'app-tab2',
  templateUrl: 'tab2.page.html',
  styleUrls: ['tab2.page.scss']
})
export class Tab2Page {

	currentXablau:any = null;
  constructor(public xablau: XablauService) {
		let today = new Date();
		let month = today.getMonth() + 1;
		let year = today.getFullYear();

		this.xablau.getXablauByDate(month,year).subscribe((res) => {
			if (res.status === 200){
				this.currentXablau = res.data;
			}
			else if (res.status === 400){
				console.log(res.message);
			}
		});
	}

}
