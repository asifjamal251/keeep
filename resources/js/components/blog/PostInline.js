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
            console.log(response)
            this.setState({posts:this.state.posts.concat(response.data.posts),'isLoaded':true,'paginate':response.data.paginate,processing:false});
        })
        .catch((error)=>{
            this.setState({'isLoaded':true,error:true,processing:false});
        });
    }
    render() {

        const {error,isLoaded,posts,paginate,processing} = this.state;

        return (

              <section id="portfolio"  className="section-bg page-content" >
      <div className="container">

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
                        <div key={index} className="blog_left_single_item">
                        <Link to={'/post/'+post.slug}>
                            <div className="blog_pic image_fulwidth"  style={{  backgroundImage: "url(" + post.image + ")",
            backgroundPosition: 'center',
            backgroundSize: 'cover',
            backgroundRepeat: 'no-repeat',height: '203px',}} > 

                              <span ></span>

                            
                              <h4 className="date_position">25 JUNE 2017</h4>
                            </div>
                            </Link>
                            <div className="blog_left_single_content para_default">
                              <div className="blog_author_area"> 
                                  <span><i className="fa fa-user"></i>Admin</span>
                                 <span> <i className="fa fa-tag"></i>Consulting</span>
                                 <span> <i className="fa fa-comments-o"></i> 2</span>
                               </div>

                              <h3><Link to={'/post/'+post.slug}>{post.title}</Link></h3>
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