ClassicEditor
            .create( document.querySelector( '#add-admin-product-description' ) )
            .then( editor => {
                    console.log( editor );
            } )
            .catch( error => {
                    console.error( error );
            } );