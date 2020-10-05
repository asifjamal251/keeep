import React, { Component } from 'react';
import {Helmet} from "react-helmet";
import ReactDOM from 'react-dom';
import { Link } from 'react-router-dom';
import Slider from './home/Slider';
import Service from './home/Service';

export default class Home extends Component {
	
	constructor(props) {
        super(props); 
         this.state = {
            sliders: []
        }; 
    }

    componentDidMount() {
        document.body.classList.add('home'); 

        axios.post('/api/slider')
         .then(response=>{
            this.setState({sliders:response.data});
        });     
    }
    componentWillUnmount() {
        document.body.classList.remove('home')
   }

    render() {
      
        return (
       <React.Fragment>
     

 
 <Slider />


  <section id="features" className="features">
  <div className="container">
    <div className="row">
      <div className="col-md-12">
        <div className="section-title ptb-20">
          <h2 className="font-w-8"><span className="color">A</span>WESOME <span className="color">F</span>EATURES</h2>
          <p className="font-w-6">Sed ut perspiciatis unde omnis iste natus error sit voluptatem</p>
        </div>
        <div className="row section">
          
          <div className="col-lg-3 col-md-6 col-sm-6 col-xs-12">
            <div className="feat p-25 bx-shadow"> <i className="fa fa-tablet font-45"></i>
              <h5 className="font-20 pt-15">Web UI Design</h5>
              <h6 className="font-13 font-w-6">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod voluptatem</h6>
            </div>
          </div>
          
          
          <div className="col-lg-3 col-md-6 col-sm-6 col-xs-12">
            <div className="feat p-25 bx-shadow active"> <i className="fa fa-leaf font-45"></i>
              <h5 className="font-20 pt-15">Creative Design</h5>
              <h6 className="font-13 font-w-6">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod voluptatem</h6>
            </div>
          </div>
          
          
          <div className="col-lg-3 col-md-6 col-sm-6 col-xs-12">
            <div className="feat p-25 bx-shadow"> <i className="fa fa-rocket font-45"></i>
              <h5 className="font-20 pt-15">Performance</h5>
              <h6 className="font-13 font-w-6">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod voluptatem</h6>
            </div>
          </div>
          
          
          <div className="col-lg-3 col-md-6 col-sm-6 col-xs-12">
            <div className="feat p-25 bx-shadow"> <i className="fa fa-star-o font-45"></i>
              <h5 className="font-20 pt-15">Flexibility</h5>
              <h6 className="font-13 font-w-6">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod voluptatem</h6>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<Service />


    </React.Fragment>
        );
    }
}