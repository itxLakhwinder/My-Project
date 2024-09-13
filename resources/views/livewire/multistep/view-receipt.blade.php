<p class="delivery-text pb-4">Upload Confirmation Receipt</p>
<div class="upload-confirmation-page">
    <div class="logo-area">
        <img src="img/home-depot-logo.png" alt="">
        <span class="upload-confirmation-logo">How doers get more done</span>
    </div>
    <div class="row py-3 arrive-order-section ">
        <div class="col-md-8 text-center track-order">
            <p class="order-title">Your order is on its way to our store!</p>
            <p class="order-description">Est. Pickup Date:<span>Tuesday,August 24</span></p>
            <img src="img/Layer-0.png" alt="">
            <p class="order-number"> Order Number</p>
            <div class="track-black-box"></div>
            <input type="submit" value="Track Your Order" class="track-btn">
        </div>
    </div>
    <div class="row px-2">
        <p class="order-description">Hi Laura,</p>
        <p class="order-description">Your order is expected to arrive at the store <span>Tuesday,August
                24th.</span>We'll send
            you an email when your order is ready for pickup.</p>
        <div class="pickup-section">
            <div>
                <p class="pickup-store-title">Pickup Store</p>
                <div class="pickup-blackbox"></div>
            </div>
            <div>
                <p class="pickup-store-title">Pickup Person</p>
                <p class="order-description">Laura</p>
            </div>
            <div>
                <p class="pickup-store-title">Tracking Numbers</p>
                <div class="tracking-blackbox"></div>
            </div>
        </div>
    </div>
    <div class="red-table-border">
        <table class="item-table">
            <thead>
                <th>Item</th>
                <th></th>
                <th>Unit Price</th>
                <th>Qty</th>
                <th>Item Total</th>
            </thead>
            <tbody>
                <tr>
                    <td class="table-item-area">
                        <div class="table-black-box"></div>
                    </td>
                    <td>
                        <p class="order-description-1"><span>Hampton Bay </span>Combridge and Beacon Park
                            Sunbrella
                            Spectrum Denim Dining Chair Slipcover</p>
                        <p class="order-description-2">Store SKU #1002762525<br>Internet #303252935</p>
                    </td>
                    <td class="price-text">$59.00</td>
                    <td class="quality">2</td>
                    <td class="total-item">$118.00</td>
                </tr>
            </tbody>
        </table>
        <div class="row d-flex justify-content-between pt-3">
            <div class="col-md-5"> <input type="submit" value="Check Order Status" class="order-status-btn">
            </div>
            <div class="col-md-6">
                <table class="subtotal-table">
                    <tr>
                        <th>Subtotal</th>
                        <td>$118.00</td>
                    </tr>
                    <tr>
                        <th>Shipping</th>
                        <td>FREE</td>
                    </tr>
                    <tr>
                        <th>Sales Tax</th>
                        <td>$10.62</td>
                    </tr>
                </table>
                <div class="order-btn-area py-3">
                    <input type="submit" value="Order Total" class="order-total-btn">
                    <input type="submit" value="$128.62" class="order-total-btn">
                </div>
            </div>
        </div>
    </div>
    <canvas id="the-canvas"></canvas>
    @if ($e_reciept)
    <img src="{{ $e_reciept->temporaryUrl() }}" alt="Preview">
    @endif
</div>
<script type="text/javascript">
    // console.log(pdfjsLib)
   // pdfjsLib.disableWorker = true;

    // var pdf = document.getElementById('pdf');
    // pdf.onchange = function(ev) {
    // var file;
    // var fileReader;
    //   if (file = document.getElementById('pdf').files[0]) {
    //     console.log('file', file);
    //     fileReader = new FileReader();
    //     fileReader.onload = function(ev) {
    //       console.log('ev',fileReader);

    //       var pdfData = fileReader.result;
    //       console.log('pdfData', pdfData)
          
        //   var pdfData = localStorage.getItem("pdfData");
        //   // var a = new Uint8Array(pdfData)
        //   console.log('pdfData', a)
         
        //   var loadingTask = pdfjsLib.getDocument({data: pdfData});

        //   console.log('loadingTask', loadingTask)
          
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

        // fileReader.readAsArrayBuffer(file);    


    window.addEventListener('DOMContentLoaded', () => {
        Livewire.on('fileChosen', (inputFieldId, file) => {
            if (inputFieldId === 'image') {
                let reader = new FileReader();

                reader.onload = (e) => {

                    let imgElement = document.createElement('img');
                    imgElement.src = e.target.result;
                    imgElement.alt = 'Preview';

                    let previewContainer = document.querySelector('#preview-container');
                    previewContainer.innerHTML = '';
                    previewContainer.appendChild(imgElement);
                };

                reader.readAsDataURL(file);
            }
        });
    });

  </script>

