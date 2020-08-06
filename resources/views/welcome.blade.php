<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Cairo|Tajawal&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{env('PUBLIC_PATH')}}/css/main.css">
    <title>{{env('APP_NAME')}}</title>
     <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.0/axios.min.js" integrity="sha256-S1J4GVHHDMiirir9qsXWc8ZWw74PHHafpsHp5PXtjTs=" crossorigin="anonymous"></script>
  
</head>

<body>
    <div class="col-12 px-0">
        <div class="col-12 px-0 ">
            <div class="text-section text-center container">
                <div class="col-12">
                    <div class="text-center">
                    </div>
                </div>
            </div>
        </div>





        <div class="col-12 px-0 justify-content-center">
            <div class="container  d-flex" style="min-height: 100vh">
                <div class="col-12 my-auto" id="vue-app">
                    <div class="col-12 px-0 row d-none" v-if="fixing" v-bind:class="(fixing)?'d-flex':''">




                        <div class="col-12 col-md-12 col-lg-6 order-1 order-lg-6">
                            <div class=" ">
                                <h1 class="text-center tajawal py-5 mt-5 font-4 font-md-4">@{{title}}</h1>
                            </div>
                        </div>

                        <div class="col-12 col-sm-6 col-md-4 col-lg-3  " v-for="(value, index ) in websites"
                            v-bind:class="['order-'+ (index + 2),'order-lg-'+ (index + 1)]" >
                            <a v-bind:href="value.link" target="_blank">
                              
                            <div class="site-card" v-bind:class="(style=='square')?'':'circle'">
                               
                                <div class="col-12 site-content-area" >
                                    <img v-bind:src="(style=='square')?'{{env('PUBLIC_PATH')}}/uploads/'+value.logo_path:'{{env('PUBLIC_PATH')}}/uploads/'+value.icon_path" class="my-auto">
                                </div>

                            </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-12 px-0  text-center d-none" v-if="!fixing" v-bind:class="(!fixing)?'d-flex':''" >
                      <h1 class="text-center cairo" style="margin:0px auto;">الموقع تحت الصيانة</h1>  
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
   
    <script>
        var websites ; 
        
 
        new Vue({
            el: '#vue-app',
            data: {
                title:{},
                style:{},
                number_of_sites:{},
                fixing:{},
                websites: {

                     
                }
            },
            methods: {

            },
            mounted(){ 
                axios.get("{{route('settings.get')}}").then((response) => {  
                    this.title=response.data[0].title;
                    this.style=response.data[0].style;
                    this.number_of_sites=response.data[0].number_of_sites;
                    this.fixing=response.data[0].fixing;
                 // console.log(response.data);
                });  
                axios.get("{{route('websites.get-api')}}").then((response) => {
                    this.websites=response.data;
                  console.log(response.data);
                });
            }

        });
    </script>
    <script type="text/javascript" src="{{env('PUBLIC_PATH')}}/js/main.js"></script>
</body>

</html>