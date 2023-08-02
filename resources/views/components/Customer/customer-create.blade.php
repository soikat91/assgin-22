<div class="modal" id="create-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <form id="insertData">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Category</h5>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <label class="form-label">Customer Name *</label>
                                <input type="text" class="form-control" id="customerName">
                            </div>
                            <div class="col-12 p-1">
                                <label class="form-label">Customer Email *</label>
                                <input type="text" class="form-control" id="customerEmail">
                            </div>
                            <div class="col-12 p-1">
                                <label class="form-label">Customer Mobile *</label>
                                <input type="text" class="form-control" id="customerMobile">
                            </div>
                            <div class="col-12 p-1">
                                <label class="form-label">Customer Address *</label>
                                <input type="text" class="form-control" id="customerAddress">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="model-close" class="btn btn-sm btn-danger" data-bs-dismiss="modal" aria-label="Close">Close</button>
                    <button  type="submit" class="btn btn-sm  btn-success" >Save</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
        $('#insertData').on('submit',async function(e){
            e.preventDefault()

            let customerName=document.getElementById("customerName").value;
            let customerEmail=document.getElementById("customerEmail").value;
            let customerMobile=document.getElementById("customerMobile").value;
            let customerAddress=document.getElementById("customerAddress").value;
            document.getElementById('model-close').click();
            if(customerName.length===0){

                errorToast('Customer Name required')
            }else if(customerEmail.length===0){
                errorToast('Customer Email required')
            }else if(customerMobile.length===0){
                errorToast('Customer Mobile required')
            }else if(customerAddress.length===0){
                errorToast('Customer Address required')
            }else{

                $('#create-modal').modal('hide') //jquery use
               
                showLoader();
                let res=await axios.post('/create-customer',{
                    name:customerName,
                    email:customerEmail,
                    mobile:customerMobile,
                    address:customerMobile
                })
                hideLoader();
                if(res.status==201){
                    successToast('Created Success')
                    $('#create-modal').trigger("reset") 
                    await getCustomer()
                }else{
                    errorToast('Request Failed')
                }

            }
        })

</script>




