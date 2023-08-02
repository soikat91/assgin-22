<div class="content">
    <div class="page-header">
        <div class="page-title">
            <h4>Promotional Mail</h4>
            <h6>Send Mail All Customers</h6>
        </div>
    </div>

    <div class="md:grid md:grid-cols-2 gap-x-6">
        <div>
            <div class="card">
                <div class="card-body">
                    <form id="promotion_form">
                        <div class="form-group">
                            <label>subject</label>
                            <input type="text" class="form-control" id="mailSubject">
                        </div>
                        <div class="form-group">
                            <label>Message</label>
                            <textarea id="mailMessage" cols="30" rows="20" class="form-control"></textarea>
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Send</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

    $('#promotion_form').on('submit',async function(e){
        e.preventDefault();
        //alert('hi')

       let mailSubject=document.getElementById('mailSubject').value
       let mailMessage=document.getElementById('mailMessage').value

       if(mailSubject.length===0){
            errorToast("Subject Required")
       }else if(mailMessage.length===0){
            errorToast("Message Required")
       }else{

        let res=await axios.post('/promotional-customer-mail',{subject:mailSubject,message:mailMessage})
            if(res.status===200){
                successToast("Promotion Success")
            }else{  
                                  
                errorToast("Request Failed")
            }

       }
        
    })

</script>
