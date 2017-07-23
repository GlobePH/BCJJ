import { Component } from '@angular/core';
import { NavController } from 'ionic-angular';

import { ModalController  } from 'ionic-angular';

import { ModalContent } from './modal';
 
@Component({
  selector: 'page-welcome',
  templateUrl: 'welcome.html'
})
export class WelcomePage {
 
  constructor(public navCtrl: NavController, public modalCtrl: ModalController) {
 
  }

  openPopover(myEvent) {
    let modal = this.modalCtrl.create(ModalContent);
    modal.present();
  }
 
}