<?php
        
	    //Include Footer
	    include 'Includes/templates/header.php';
	
	
?>
<!-- Add New Car Modal -->

                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="add_new_carLabel">Add New Car</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form @submit.prevent="checkForm">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="car_brand">Car Brand</label>
                                        <select v-model="car_brand" class="form-select">
                                            <option v-for="brand in brands" :key="brand.id" :value="brand.id"> brand.name </option>
                                        </select>
                                       
                                    </div>
                                    <div class="form-group">
                                        <label for="car_type">Car Type</label>
                                        <select v-model="car_type" class="form-select">
                                            <option v-for="type in types" :key="type.id" :value="type.id"> type.label </option>
                                        </select>
                                        
                                    </div>
                                    <div class="form-group">
                                        <label for="car_color">Car Color</label>
                                        <input type="text" v-model="car_color" class="form-control" placeholder="Car Color">
                                        
                                    </div>
                                    <div class="form-group">
                                        <label for="car_model">Car Model</label>
                                        <input type="text" v-model="car_model" class="form-control" placeholder="Car Model">
                                        
                                    </div>
                                    <div class="form-group">
                                        <label for="car_description">Car Description</label>
                                        <textarea v-model="car_description" class="form-control"></textarea>
                                        
                                    </div>
                                    <div class="form-group">
                                        <label for="car_price">Car Price</label>
                                        <input type="number" step="0.01" v-model="car_price" class="form-control" placeholder="Car Price">
                                      
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-info">Add Car</button>
                                </div>
                            </form>
                        </div>
                    </div>
               
                <?php
        
	    //Include Footer
	    include 'Includes/templates/footer.php';
	
	
?>