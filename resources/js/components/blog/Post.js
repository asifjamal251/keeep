import React, { Component } from 'react';
import {Helmet} from "react-helmet";
import { Link } from 'react-router-dom';
import ReactDOM from 'react-dom';

export default class Post extends Component {
	constructor(props) {
        super(props);   
        this.state = {
            error: false,
            isLoaded: true,
            processing: false,
            paginate: {},
            posts:[],
            count:0,
        }; 
    }    
    componentDidMount(){
        this.loadData(1);
    }
    loadData(page){
        this.setState({processing:true})
        axios.post('/api/post',{'page':page})

        .then((response)=>{
            this.setState({posts:this.state.posts.concat(response.data.posts),'isLoaded':true,'paginate':response.data.paginate,processing:false});
        })
        .catch((error)=>{
            this.setState({'isLoaded':true,error:true,processing:false});
        });
    }
    render() {

        const {error,isLoaded,posts,paginate,processing} = this.state;

        return (

              <section id="about"  className="section-bg page-content" >
      <div id="" className="container">

        <header className="section-header">
          <h3 className="section-title">All Posts</h3>
        </header>


        <div className="row blog">

        <div className="col-md-8">
        <div className="row about-cols">

        {
            (isLoaded ==true ) ?(


                (posts.length > 0) ?(
                    posts.map((post,index)=>(


                        <div key={index} className="col-md-6">
                            <div className="about-col">
                                <div className="img">
                                    <img src={post.image} alt="" className="img-fluid" />
                                    <div className="icon"><i className="ion-ios-speedometer-outline"></i></div>
                                </div>
                                <h2 className="title">
                                    <Link to={'/post/'+post.slug}>{post.title}</Link>
                                </h2>
                                <div dangerouslySetInnerHTML={{__html: post.body.substr(0, 275)}}>
                                </div>
                            </div>
                        </div>

                    ))
                ):(
                    <div className="text-center col-md-12"> 
                        <img className="img-fluid" src="/image/no-result1.png" />
                        <h3>Sorry! No matching results found</h3>
                        <p>Try a different keyword maybe?</p>
                        
                    </div>
                )

            ):(
                 <div className="justify-content-center">Loading.........</div>
            )
        }

       

          

          
         </div>
        </div>
        </div>




      </div>


       {
            (paginate.total > posts.length)&&(
                <div className="container">
                <div className="justify-content-center row">
                    <button style={{marginTop:'50px'}} className="btn btn-success" onClick={()=>this.loadData(paginate.current_page+1)} disabled={processing}> Load More </button>
                </div>
                </div>
            )
        }
    </section>

              );
    }
}