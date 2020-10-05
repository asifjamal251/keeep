import React, { Component } from 'react';
import {Helmet} from "react-helmet";
import ReactDOM from 'react-dom';
import { Link } from 'react-router-dom';


export default class Service extends Component {
	constructor(props) {
        super(props); 
         this.state = {
            sliders: []
        }; 
    }

    componentDidMount() {

        axios.post('/api/slider')
         .then(response=>{
            this.setState({sliders:response.data});
        });     
    }

    render() {
        return (
             <section id="services" className="services">
  <div className="container">
    <div className="row">
      <div className="col-md-12">
        <div className="section-title ptb-20">
          <h2 className="font-w-8"><span className="color">O</span>UR SERVICE</h2>
          <p className="font-w-6">Sed ut perspiciatis unde omnis iste natus error sit voluptatem</p>
        </div>
        <div className="section row">
          
          <div className="col-md-4 col-sm-6 col-xs-12">
            <div className="item bx-shadow"> <i className="fa fa-desktop"></i>
              <h3 className="txt-lft">Web Design</h3>
              <p className="txt-lft">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium totam rem.</p>
            </div>
          </div>
          
          
          <div className="col-md-4 col-sm-6 col-xs-12">
            <div className="item bx-shadow"> <i className="fa fa-wordpress"></i>
              <h3 className="font-weight">Web Development</h3>
              <p className="line-height-1">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium totam rem.</p>
            </div>
          </div>
          
          
          <div className="col-md-4 col-sm-6 col-xs-12">
            <div className="item bx-shadow"> <i className="fa fa-mobile-phone"></i>
              <h3 className="font-weight">Mobile App Development</h3>
              <p className="line-height-1">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium totam rem.</p>
            </div>
          </div>
          
          
          <div className="col-md-4 col-sm-6 col-xs-12">
            <div className="item bx-shadow"> <i className="fa fa-gamepad"></i>
              <h3 className="font-weight">Online Marketing</h3>
              <p className="line-height-1">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium totam rem.</p>
            </div>
          </div>
          
          
          <div className="col-md-4 col-sm-6 col-xs-12">
            <div className="item bx-shadow"> <i className="fa fa-camera-retro"></i>
              <h3 className="font-weight">Photography</h3>
              <p className="line-height-1">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium totam rem.</p>
            </div>
          </div>
          
          
          <div className="col-md-4 col-sm-6 col-xs-12">
            <div className="item bx-shadow"> <i className="fa fa-shield"></i>
              <h3 className="font-weight">SEO</h3>
              <p className="line-height-1">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium totam rem.</p>
            </div>
          </div>
       
        </div>
      </div>
    </div>
  </div>
</section>

        );
    }
}