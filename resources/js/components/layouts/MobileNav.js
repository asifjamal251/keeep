import React, { Component } from 'react';
import  {NavLink} from 'react-router-dom'
export default class MobileNav extends Component {
   constructor(props) {
        super(props); 
        
    }

    componentDidMount(){
       

        
    }

    render() {
        return (


            <nav id="mobile-nav">
            <ul className="" id="">
                  

                  <li className="menu-active">
                    <NavLink className="nav-link"  exact={true} to="/">Home</NavLink>
                  </li>

                  <li>
                    <NavLink className="nav-link" exact={true} to="/about">About</NavLink>
                  </li>

                  <li>
                    <NavLink className="nav-link" exact={true} to="/services">Services</NavLink>
                  </li>

                  <li>
                    <NavLink className="nav-link" exact={true} to="/contact">Contact</NavLink>
                  </li>

                  <li>
                    <NavLink className="nav-link" exact={true} to="/contact/list">Contact List</NavLink>
                  </li>
                  
            </ul>
      </nav>


      
        );
    }
}