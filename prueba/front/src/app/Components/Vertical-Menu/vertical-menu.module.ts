import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { VerticalMenuComponent } from './vertical-menu.component';
import { RouterModule } from '@angular/router';


@NgModule({
  declarations: [VerticalMenuComponent],
  imports: [
    CommonModule,
    RouterModule

  ],
  exports:[VerticalMenuComponent]
})
export class VerticalMenuModule { }
