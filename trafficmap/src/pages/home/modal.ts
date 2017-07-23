import { Component } from '@angular/core';
import { ViewController } from 'ionic-angular';
import { NavController } from 'ionic-angular';

import { MainPage } from '../main/main';

@Component({
  templateUrl: 'modal.html'
})

export class ModalContentMain {
todo = {}

constructor(public viewCtrl: ViewController, public navCtrl: NavController) {}

 cancel() {
   let data = { 'foo': 'bar' };
   this.viewCtrl.dismiss(data);
 }
 
 goToOtherPage() {
     this.navCtrl.push(MainPage);
  }
}

