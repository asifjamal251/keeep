import React, { Component } from 'react';
import {Helmet} from "react-helmet";
import ReactDOM from 'react-dom';

export default class Contact extends Component {
	  constructor(props) {
      super(props); 
      this.onSubmit = this.onSubmit.bind(this);
      this.state={
        name:'',
        email:'',
        mobile:'',
        subject:'',
        message:'',
      } 
    }

  

    onSubmit(e){
      e.preventDefault();
      var formData = {};
      new FormData(event.target).forEach(function(value, key) { 
          formData[key] = value;
      });
      
      axios.post('/api/contact/store',formData)
      .then(res=>{
       toastr.success('toastr now works with Laravel 5.4+');
      });
    }


    render() {
        return (
      <section id="contact" className="section-bg wow fadeInUp page-content">
      <Helmet>
            <meta charSet="utf-8" />
            <title>The Code | Contact</title>
            <meta name="description" content="This is contact page" />
          </Helmet>
      <div className="container">

        <div className="section-header">
          <h3>Contact Us</h3>
          <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
        </div>

        <div className="row contact-info">

          <div className="col-md-4">
            <div className="contact-address">
              <i className="ion-ios-location-outline"></i>
              <h3>Address</h3>
              <address>A108 Adam Street, NY 535022, USA</address>
            </div>
          </div>

          <div className="col-md-4">
            <div className="contact-phone">
              <i className="ion-ios-telephone-outline"></i>
              <h3>Phone Number</h3>
              <p><a href="tel:+155895548855">+1 5589 55488 55</a></p>
            </div>
          </div>

          <div className="col-md-4">
            <div className="contact-email">
              <i className="ion-ios-email-outline"></i>
              <h3>Email</h3>
              <p><a href="mailto:info@example.com">info@example.com</a></p>
            </div>
          </div>

        </div>

        <div className="form">
          <div id="sendmessage">Your message has been sent. Thank you!</div>
          <div id="errormessage"></div>
          <form onSubmit={this.onSubmit} method="post" role="form" className="contactForm">
            <div className="form-row">
              <div className="form-group col-md-6">
                <input type="text" name="name"  className="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                <div className="validation"></div>
              </div>
              <div className="form-group col-md-6">
                <input type="email"  className="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                <div className="validation"></div>
              </div>

              <div className="form-group col-md-6">
              <input type="text" className="form-control" name="mobile" id="mobile" placeholder="Mobile No." data-rule="minlen:10" data-msg="Please enter your mobile number" />
              <div className="validation"></div>
            </div>

            <div className="form-group col-md-6">
              <input type="text" className="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
              <div className="validation"></div>
            </div>

            </div>
            
            <div className="form-group">
              <textarea className="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
              <div className="validation"></div>
            </div>
            <div className="text-center"><button type="submit">Send Message</button></div>
          </form>
        </div>

      </div>
    </section>
        );
    }
}