import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { ClientRoutingModule } from './client-routing.module';
import { FormClientModule } from './Form-client/form-client.module';
import { NgxPaginationModule } from 'ngx-pagination';
import { PasswordValidate } from 'src/app/Global_Services/Security/PasswordValidate.service';
import {HttpClientModule } from '@angular/common/http';
import { ClientService } from './Services/client.service';
import { FormsModule } from '@angular/forms';
import { ClientsComponent } from './clients.component';
import { BaseListClassService } from 'src/app/Global_Services/Component-list/base-list-class.service';

@NgModule({
  declarations: [ClientsComponent],
  imports: [
    CommonModule,
    ClientRoutingModule,
    FormClientModule,
    HttpClientModule,
    NgxPaginationModule,
    FormsModule
  ],
  providers:[PasswordValidate, ClientService, BaseListClassService]
})
export class ClientsModule { }
