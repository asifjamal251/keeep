import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class ContactList extends Component {
	  constructor(props) {
        super(props); 
         this.state = {
          isLoaded: true,
            contacts: []
        }; 
    }

    componentDidMount(){
        axios.post('/api/contact')
         .then(response=>{
            this.setState({contacts:response.data,'isLoaded':true,});
        });

        
    }


    render() {
        const {contacts,isLoaded} = this.state;
        return (
            <section id="about" className="page-content">
                 <div className="container">

                  <div className="section-header">
                    <h3>Contact Us</h3>
                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
                  </div>
                 

                  <table className="table table-hover table-dark">
                    <thead>
                      <tr>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>Email</th>
                      </tr>
                    </thead>
                    <tbody>
                    {
                      (isLoaded ==true ) ?(
                        this.state.contacts.map((contact,key)=>{
                            return(

                                <tr key={key}>
                                    <td>{contact.name}</td>
                                    <td>Doe</td>
                                    <td>john@example.com</td>
                                </tr>
                            )
                        })
                        ):(
                             <div className="justify-content-center">Loading.........</div>
                        )
                    }
                     
                    </tbody>
                  </table>
                   </div>

            </section>
        );
    }
}