<script type="text/javascript">
    $( document ).ready(function(){
        $("{{ (isset($selector)&&!is_null($selector)) ? $selector : '#my-dropzone'}}").dropzone({
            url: "{{ (isset($url)&&!is_null($url)) ? $url : '/test-upload-url'}}", // If not using a form element 
            method: "{{ (isset($method)&&!is_null($method)) ? $method : 'POST'}}",  
            maxFilesize: "{{ (isset($max_file_size)&&!is_null($max_file_size)) ? $max_file_size : '10'}}",
            parallelUploads: 2,
            createImageThumbnails: true,
            thumbnailWidth: 120,
            thumbnailHeight: 120, 
            maxFiles: "{{ (isset($max_files)&&!is_null($max_files)) ? $max_files : 'POST'}}",
            acceptedFiles:
            @if((isset($accepted_files)&&!is_null($accepted_files)))
            "{{$accepted_files}}",
            @else 
            "@include('layouts.configs')",
            @endif
             
            addRemoveLinks: true,
            thumbnailMethod: 'contain', 
            dictDefaultMessage: "<span style='color:#3953f3;font-size:18px;'> <img src='https://i.suar.me/qeYOx/l' style='width:80px;height:80px;display:inline-block;position:relative;top:0px' alt='رفع ملف'> <span>",
            dictFallbackMessage: "عفوا المتصفح لديك لا يدعم سحب الملفات و إفلاتها",
            dictFileTooBig: "عفوا حجم الملف الحالي هو @{{filesize}} ميجا بايت واقصي حد مسموح به هو @{{maxFilesize}} ميجا بايت",
            previewsContainer:{{ (isset($preview_container)&&!is_null($preview_container)) ? $preview_container : 'null'}},
            dictRemoveFileConfirmation:"سوف يتم الحذف ولا يمكن إرجاعة",
            dictInvalidFileType: "غير مسموح برفع هذا النوع من الملفات",
            dictResponseError: "حدث خطأ اثناء الرفع كود الخطا : @{{statusCode}}",
            dictCancelUpload: "إلغاء رفع الملف",
            dictUploadCanceled: "تم إلغاء رفع الملف من خلالك ",
            dictCancelUploadConfirmation: " هل انت متأكد من رغبتك بإلغاء الرفع ؟ ",
            dictRemoveFile: "<span style='margin-top:0px;display:inline-block;cursor:pointer'><span style='color:#2381c6' class='fal fa-trash'></span> حذف الملف </span>",
            dictMaxFilesExceeded: "لقد تجاوزت الحد الاقصي المسموح به في رفع الملفات وهو @{{maxFiles}} ملف",
            autoProcessQueue:true, 
            removedfile: function(file) {
              
                //console.log(file.nominationId);
               /* x = confirm('هل انت متأكد من الحذف ؟ ');
                if(!x)  return false; */
               // return 0;

               

                 var name = file.name;   
                 $.ajax({
                  method: "{{ (isset($remove_method)&&!is_null($remove_method)) ? $remove_method : 'POST'}}",
                  url: "{{ (isset($remove_url)&&!is_null($remove_url)) ? $remove_url : '/test-upload-url'}}",
                  data: { name: file.nominationId , type :file.type ,parent_id:file.parent_id ,_token:'{{ csrf_token() }}'},
                })
              .done(function( msg ) {
                console.log(msg);
              });  
            
            var uploaded_files=$("{{ (isset($remove_selector)&&!is_null($remove_selector)) ? $remove_selector : '#uploaded_files'}}").val();
            $("{{ (isset($remove_selector)&&!is_null($remove_selector)) ? $remove_selector : '#uploaded_files'}}").val(uploaded_files.replace(file.nominationId+'/',''));
            console.log(file.nominationId) ; 
            var _ref;   return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
            },
 
             
            init: function() {
    
            $('.pace-inactive').fadeIn('fast');
            myDropzone{{ (isset($dz_unique)&&!is_null($dz_unique)) ? $dz_unique : ''}} = this;
            @if( (isset($fetch_exist_data)&&!is_null($fetch_exist_data)&&$fetch_exist_data!=false) )
            
            //console.log(this);
            
            var temp_files=[];
            $.ajax({
                url: "{{ (isset($fetch_exist_data_url)&&!is_null($fetch_exist_data_url)) ? $fetch_exist_data_url : '/fetch-test-upload'}}",
                type:"{{ (isset($fetch_exist_data_method)&&!is_null($fetch_exist_data_method)) ? $fetch_exist_data_method : 'POST'}}",
                data: {_token: '{{ csrf_token() }}',id:"{{ (isset($fetch_exist_data_id)&&!is_null($fetch_exist_data_id)) ? $fetch_exist_data_id : '1'}}"},
                dataType: 'json',
                success: function(response){ 

                    //this.files.push("mockFile");
                    //console.log(response);
                $.each(response, function(key,value) {
                    /*console.log(value);*/
                    $('.pace-inactive').fadeIn('fast');
                    var mockFile = { name: value.path, size: value.size,nominationId:value.path,type:'old',parent_id:{{ (isset($parent_id)&&!is_null($parent_id)) ? $parent_id : '1'}} };
                    temp_files.push(mockFile);
                    //console.log(arrayx);
                     //this.files.push("mockFile");
                    /*$("{{ (isset($remove_selector)&&!is_null($remove_selector)) ? $remove_selector : '#uploaded_files'}}").val( $("{{ (isset($remove_selector)&&!is_null($remove_selector)) ? $remove_selector : '#uploaded_files'}}").val()+value.path+'/' );*/

                    myDropzone{{ (isset($dz_unique)&&!is_null($dz_unique)) ? $dz_unique : ''}}.emit("addedfile", mockFile);
                    myDropzone{{ (isset($dz_unique)&&!is_null($dz_unique)) ? $dz_unique : ''}}.emit("thumbnail", mockFile, '{{env('PUBLIC_PATH')}}'+'/uploads/users/'+{{\Auth::user()->id}}+'/portfolios/'+{{ (isset($fetch_exist_data_id)&&!is_null($fetch_exist_data_id)) ? $fetch_exist_data_id : '1'}}+'/'+value.path);
                    //myDropzone{{ (isset($dz_unique)&&!is_null($dz_unique)) ? $dz_unique : ''}}.emit("success", mockFile);
                    myDropzone{{ (isset($dz_unique)&&!is_null($dz_unique)) ? $dz_unique : ''}}.emit("complete", mockFile);
                    myDropzone{{ (isset($dz_unique)&&!is_null($dz_unique)) ? $dz_unique : ''}}.emit("maxfilesexceeded", mockFile);
                    //console.log(myDropzone{{ (isset($dz_unique)&&!is_null($dz_unique)) ? $dz_unique : ''}}.files);
                   // this._updateMaxFilesReachedClass();
        
                });

                

            
                }

            });

           
            this.files=temp_files;
            

            @endif


    
        /*   var mockFile = {
                name: file.name,
                size: file.size,
                type: file.ext,
                viewLink: "uploads/" + file.file,
                nominationId: file.nominationId,
                id: file.id,
                media: "evaluation_files"
            };*/
            
    
    
    
            this.on("addedfile", function(file) {
                /*if(this.files[file]!=null)
                {
                 this.files.push(file);   
                }
               console.log(this.files);*/

                
                @if(isset($max_files))
                if (this.files[{{$max_files}}]!=null){ 
                    
                    this.files.pop();
 
                    var uploaded_files=$("{{ (isset($remove_selector)&&!is_null($remove_selector)) ? $remove_selector : '#uploaded_files'}}").val();
                    $("{{ (isset($remove_selector)&&!is_null($remove_selector)) ? $remove_selector : '#uploaded_files'}}").val(uploaded_files.replace(file.nominationId+'/',''));
                    var _ref;   return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
                     
                    }
                    
                @endif
                
 
            });
            this.on("sending", function(file, xhr, data) {
                data.append("_token", "{{ csrf_token() }}");
                
            });
    
        /*this.on('maxfilesexceeded', function (file) {
            this.removeAllFiles();
            this.addFile(file);
        });*/
    
                  
    /*
                   this.on("drop", function(event) {
                        console.log(myDropzone.files);            
                    });
    
                },*/
    
                this.on("success", function(file, responseText) {
        
                    $("{{ (isset($remove_selector)&&!is_null($remove_selector)) ? $remove_selector : '#uploaded_files'}}").val($("{{ (isset($remove_selector)&&!is_null($remove_selector)) ? $remove_selector : '#uploaded_files'}}").val()+responseText+'/');
                    file.nominationId=responseText;
                    //$(file.previewElement).find('.dz-remove').attr('data-name',responseText);
                
                });
                this.on("error", function(file, responseText) {
                  // console.log(responseText.errors.file[0]);
                  //$()
                });
    
                this.on("complete", function (file) {
   // console.log(this.getUploadingFiles().length);
                 $('.pace-inactive').fadeOut('slow');
                  if (this.getUploadingFiles().length === 0 && this.getQueuedFiles().length === 0) {

                  }


                /*$(file.previewElement).find('.dz-details').after(
                    "<div><span class='fa fa-trash text-danger' style='font-size: 1.5em' onclick='console.log(file.);'></span></div>"); */
                  });
                  
                  
                  
                this.on("processing", function (file) {
                    $("{{ (isset($enable_selector_after_upload)&&!is_null($enable_selector_after_upload)) ? $enable_selector_after_upload : '#upload-button'}}").attr("disabled", true);
                   $('.pace-inactive').fadeIn('fast');
                });
                this.on("queuecomplete", function (file) {
                    $("{{ (isset($enable_selector_after_upload)&&!is_null($enable_selector_after_upload)) ? $enable_selector_after_upload : '#upload-button'}}").attr("disabled", false);
                    $('.pace-inactive').fadeOut('slow');
                });
    
             }
    
            /*		    removedfile: function(file) {
                x = confirm('Do you want to delete?');
                if(!x)  return false;
            }*/
     
    
    
    
      /*  init: function() {
        this.on("addedfile", function(file) {
          if (currentFile) {
            this.removeFile(currentFile);
          }
          currentFile = file;
        });
      }*/
    
      });
    
     /*   Dropzone.options.uiDZResume = {
                success: function(file, response){
                    alert(response);
                }
            };*/
    
    
    
    });
</script>