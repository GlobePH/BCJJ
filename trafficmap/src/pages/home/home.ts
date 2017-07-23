import { Component } from '@angular/core';
import { NavController } from 'ionic-angular';
import { ModalController  } from 'ionic-angular';

import { LoginMain } from './login';
import { ModalContentMain } from './modal';

import { MainPage } from '../main/main';

@Component({
  selector: 'page-home',
  templateUrl: 'home.html'
})
export class HomePage {

rootPage: any = MainPage;

  constructor(public navCtrl: NavController, public modalCtrl: ModalController) {
  	
  }

  goToOtherPage() {
    this.navCtrl.push(MainPage);
  }

  openPopover(myEvent) {
    let modal = this.modalCtrl.create(ModalContentMain);
    modal.present();
  }

  openPopover2(myEvent) {
    let modal2 = this.modalCtrl.create(LoginMain);
    modal2.present();
  }

}
