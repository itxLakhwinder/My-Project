<p class="delivery-text">Upload Your E-Receipt</p>
<div class="row driver-form  ps-sm-5 mt-3">
    <div class="login-page">
        <div class="upload-image">
            <p>Select an Image</p>
            <!-- <canvas id="the-canvas"></canvas> -->
            <input type="file" id='pdf' wire:model="e_reciept">
        </div>
        {{-- <div class="col-md-6">
            <input type="submit" value="Continue" class="apply-btn">
        </div> --}}

        {{-- @if ($e_reciept)
            <img src="{{ $e_reciept->temporaryUrl() }}" alt="Preview">
        @endif --}}
    </div>
</div>

<!-- 

  <script type="text/javascript">

    // console.log(pdfjsLib)
    pdfjsLib.disableWorker = true;

    var pdf = document.getElementById('pdf');
    pdf.onchange = function(ev) {
    var file;
    var fileReader;
      if (file = document.getElementById('pdf').files[0]) {
        console.log('file', file);
        fileReader = new FileReader();
        fileReader.onload = function(ev) {
          console.log('ev',fileReader);

          var pdfData = fileReader.result;
          console.log('pdfData', pdfData)
          
          localStorage.setItem("pdfData", pdfData);

        //   var loadingTask = pdfjsLib.getDocument({data: pdfData});
        //   loadingTask.promise.then(function(pdf) {
        //   console.log('PDF loaded');
        //   // Fetch the first page
        //   var pageNumber = 1;
        //   pdf.getPage(pageNumber).then(function(page) {
        //     console.log('Page loaded');
            
        //     var scale = 0.8;
        //     var viewport = page.getViewport({scale: scale});

        //     // Prepare canvas using PDF page dimensions
        //     var canvas = document.getElementById('the-canvas');
        //     var context = canvas.getContext('2d');
        //     canvas.height = viewport.height;
        //     canvas.width = viewport.width;

        //     // Render PDF page into canvas context
        //     var renderContext = {
        //       canvasContext: context,
        //       viewport: viewport
        //     };
        //     var renderTask = page.render(renderContext);
        //     renderTask.promise.then(function () {
        //       console.log('Page rendered');
        //     });
        //   });
        // }, function (reason) {
        //   // PDF loading error
        //   console.error(reason);
        // });

        };
        fileReader.readAsArrayBuffer(file);
      }
    }
  </script> -->


