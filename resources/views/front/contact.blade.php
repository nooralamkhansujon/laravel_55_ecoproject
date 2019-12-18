@extends('front.master')
@section('title','Contact Page')

@section('content')
    <!-- BreadCrumb  -->
    <div class="contact-page">
        <!-- BreadCrumb -->
        <div class="container">
           <ol class="breadcrumb">
               <li class="breadcrumb-item text-uppercase">
                  <a href="index.html" class="text-primary">Home</a>
               </li>
               <li class="breadcrumb-item  active text-uppercase">
                    Contact
               </li>
           </ol>
        </div>
    </div>
    <!-- Contact Page  -->
    <div class="contact p-t-small">
      <div class="container">
          <header class="mb-5">
              <h1 class="heading-line text-warning">Contact</h1>
              <p class="lead text-muted"> 
                 Are you curious about something? Do you have some kind of problem Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea illum iure quam molestias iusto sint nam, quo sit. Iure, quos?
              </p>
          </header>
          <div class="row">
            <div class="col-md-4">
               <h3 class="heading-line text-warning">Address</h3>
               <p class='text-muted'>
                 13/25 New Averue<br>
                 New Heaven 45Y/73j <br>
                 Engianc,Great Britain <br>
               </p>

            </div>
            <div class="col-md-4">
               <h3 class="heading-line text-warning">Call Center</h3>
               <p class="text-muted " style="font-size:16px;">
                  This number is tol free i calling from Great Britain otherwise we advise you to use the electronic from of communication
               </p>
               <strong>+33 55 444 3333</strong>
            </div>
            <div class="col-md-4">
               <h3 class="heading-line text-warning">
                  Electronic Support
               </h3>
               <p class="text-muted">
                 Please feel free to write an email to us or to use our electronic  ticketing system 
               </p>
               <ul>
                <li class='text-primary'>info@fakeemail.com</li>
                <li class='text-primary'>Ticketio-our ticketing support platform</li>
               </ul>
            </div>
        </div>

        <div class="row pt-3">
            <div class="col-md-6 bg-light ">
                <h1 class="text-warning">Contact Form</h1>
                <form action="" method="POST">
                    <div class="row">
                      <div class="form-group col-md-6">
                          <label for="first_name">Your firstname *</label>
                          <input type="text" name="first_name" class="form-control" placeholder="Enter your firstname">
                      </div>
                      <div class="form-group col-md-6">
                          <label for="first_name">Your lastname *</label>
                          <input type="text" name="last_name" class="form-control" placeholder="Enter your Lastname">
                      </div>
                      <div class="form-group col-md-12">
                         <label for="email">Your Email</label>
                         <input type="email" name="email" class="form-control" placeholder="Enter Your Email">
                      </div>
                      <div class="form-group col-md-12">
                         <label for="message">Your Message for us *</label>
                        <textarea name="message" id="message" rows="5" class="form-control" placeholder="Enter your message">
                        </textarea>
                      </div>
                      <div class="form-group col-md-12">
                       <button class="btn btn-primary">
                         Send Message
                       </button>
                      </div>
                      <div class="form-group col-md-12 ">
                         <input type="text" class="form-control" name="search"  placeholder="what are you looking for?"> <br>
                         <button class="btn btn-warning">Search</button>
                      </div>

                    </div>
                </form>
            </div>
            <div class="col-md-6 bg-light">
                <p class="text-muted text-justify p-2" >Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi ut voluptas eveniet dolores quis quisquam debitis laborum hic consectetur molestiae ducimus, quos, explicabo omnis, excepturi ullam nisi. Commodi eaque at iure magni voluptas possimus, nulla quasi dignissimos, distinctio debitis labore maxime autem asperiores nam nesciunt, ullam ab repellat sapiente. Unde rerum, cupiditate cum explicabo illo architecto nisi ab temporibus iste reiciendis voluptates ex saepe. Modi, doloribus molestiae. Perspiciatis provident itaque mollitia qui repellat debitis ipsum, deserunt autem aut molestias optio numquam.</p>
            </div>

        </div>
        

      </div>
    </div>
@endsection 