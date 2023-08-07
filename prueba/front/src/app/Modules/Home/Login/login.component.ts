import { Component } from '@angular/core';
import { LoginService } from './Services/login.service';
import { ResponseInterface } from './Interface/ResponseInterface';
import { Router } from '@angular/router';
import { LocalStorageService, SessionStorageService } from 'ngx-webstorage';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css']
})
export class LoginComponent {

  password! : string  
  user_id!: string
  password_status_error: boolean = false
  user_status_error: boolean = false
  constructor(private loginService : LoginService, private route : Router, private session :LocalStorageService){}


  auth(){


    this.loginService.auth_login("cedula_usuario",this.user_id, this.password)
      .subscribe((res : ResponseInterface)=>{
        	console.log(res)
          if(res.user_status == false){

            this.user_status_error = true
           }
           if(res.password_status == false){
   
             this.password_status_error = true
           }

        if(res.password_status && res.user_status){
          
          this.session.store("userName", "asdasd")
          this.session.store("userLastname", "res.user_db.apellidos_usuario")
          this.session.store("userRol", "res.user_db.rol_fk")

          this.route.navigate(["/home"])
          
        }  
      })
  }
}
