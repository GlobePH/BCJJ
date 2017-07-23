import { Component } from '@angular/core';
import { ViewController } from 'ionic-angular';
@Component({
  templateUrl: 'modal.html'
})

export class ModalContent {
constructor(public viewCtrl: ViewController) {}
 cancel() {
   let data = { 'foo': 'bar' };
   this.viewCtrl.dismiss(data);
 }
}

