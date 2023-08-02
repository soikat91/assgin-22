
<div class="modal" id="update-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <form id="updateData">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Customer</h5>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <label class="form-label">Customer Name *</label>
                                <input type="text" class="form-control" id="customerNameUpdate">
                                <input type="hidden" class="form-control" id="customerID">
                            </div>
                            <div class="col-12 p-1">
                                <label class="form-label">Customer Email *</label>
                                <input type="text" class="form-control" id="customerEmailUpdate">
                               
                            </div>
                            <div class="col-12 p-1">
                                <label class="form-label">Customer Mobile *</label>
                                <input type="text" class="form-control" id="customerMobileUpdate">
                               
                            </div>
                            <div class="col-12 p-1">
                                <label class="form-label">Customer Address *</label>
                                <input type="text" class="form-control" id="customerAddressUpdate">
                               
                            </div>
                           
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="update-model-close" class="btn  btn-sm btn-danger" data-bs-dismiss="modal" aria-label="Close">Close</button>
                    <button onclick="Update()" type="submit" class="btn btn-sm  btn-success" >Update</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>

    async function getCustomerId(id) {

        document.getElementById('customerID').value=id;        
       showLoader()
        let res=await axios.post('/get-customer-id',{id:id})
       document.getElementById('customerNameUpdate').value=res.data['name']
       document.getElementById('customerEmailUpdate').value=res.data['email']
       document.getElementById('customerMobileUpdate').value=res.data['mobile']
       document.getElementById('customerAddressUpdate').value=res.data['address']
        hideLoader()
        
    }



    async function Update(){

        let customerNameUpdate= document.getElementById('customerNameUpdate').value
        let customerEmailUpdate= document.getElementById('customerEmailUpdate').value
        let customerMobileUpdate= document.getElementById('customerMobileUpdate').value
        let customerAddressUpdate= document.getElementById('customerAddressUpdate').value
        let ccustomerID=document.getElementById('customerID').value

        if(customerNameUpdate.length===0){
            errorToast('Name Required')
        }else if(customerEmailUpdate.length===0){
            errorToast('Email Required')
        }else if(customerMobileUpdate.length===0){
            errorToast('Mobile Required')
        }else if(customerAddressUpdate.length===0){
            errorToast('Address Required')
        }else{            
            document.getElementById('update-model-close').click()

            showLoader()
            let res=await axios.post('/update-customer',{
                name:customerNameUpdate,
                email:customerEmailUpdate,
                mobile:customerMobileUpdate,
                address:customerAddressUpdate,
                id:ccustomerID})
            hideLoader()
            if(res.status===200 && res.data===1){
                successToast("Update Success")
                await getCustomer()
            }else{
                errorToast("Failed Request")
            }

        }
    }
    // $('#updateData').on('click',async function(e){
    //     e.preventDefault()
    //     let customerNameUpdate= document.getElementById('customerNameUpdate').value
    //     let customerEmailUpdate= document.getElementById('customerEmailUpdate').value
    //     let customerMobileUpdate= document.getElementById('customerMobileUpdate').value
    //     let customerAddressUpdate= document.getElementById('customerAddressUpdate').value
    //     let ccustomerID=document.getElementById('customerID').value


    //     if(customerNameUpdate.length===0){
    //         errorToast('Name Required')
    //     }else if(customerEmailUpdate.length===0){
    //         errorToast('Email Required')
    //     }else if(customerMobileUpdate.length===0){
    //         errorToast('Mobile Required')
    //     }else if(customerAddressUpdate.length===0){
    //         errorToast('Address Required')
    //     }else{          
    //         $('#update-modal').modal('hide') 
    //         showLoader()
    //         let res=await axios.post('/update-customer',{name:customerNameUpdate,
    //             email:customerEmailUpdate,
    //             mobile:customerMobileUpdate,
    //             address:customerAddressUpdate,
    //             id:ccustomerID})
    //         hideLoader()
    //         if(res.status===200 && res.data===1){
    //             successToast("Update Success")
    //             $('#update-modal').trigger("reset") //form reset korar jnno use kora hoice trigger holo jquery cls
    //                 await getCustomer()
    //         }else{
    //             errorToast("Failed Request")
    //         }

    //     }

    // })
</script>
