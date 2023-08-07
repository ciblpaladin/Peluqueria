import { Component } from '@angular/core';
import { LocalStorageService } from 'ngx-webstorage';
@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.css']
})
export class HomeComponent {
  constructor(private session : LocalStorageService){
    
  }


  ngOnInit(){

    console.log(this.session.retrieve("userName"))
  }
}
