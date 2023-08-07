import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { HomeRoutingModule } from './home-routing.module';
import { HomeComponent } from './home.component';
import { HeaderModule } from 'src/app/Components/Header/header.module';
import { VerticalMenuModule } from 'src/app/Components/Vertical-Menu/vertical-menu.module';
import {NgxWebstorageModule} from 'ngx-webstorage';
import { SessionStorageService } from 'ngx-webstorage';


@NgModule({
  declarations: [HomeComponent],
  imports: [
    CommonModule,
    HomeRoutingModule,
    HeaderModule, 
    VerticalMenuModule,
    NgxWebstorageModule.forRoot()
  ],

  providers: [SessionStorageService]
})
export class HomeModule { }
