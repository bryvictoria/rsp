# real-estate-property
 RealEstateProperty App
 
 

 
 This simple webapp is created for Docuvett for my PHP Developer Test.
 
 FrameWork Used:
 <ul>
    <li>Laravel 8</li>
    <li>VueJs 2</li>
    <li>ElementUI 2.13</li>
 </ul>
 
 Instructions:
 <ol>
    <li> Clone or download main</li>
    <li> Execute 'npm install' & 'composer update'. I didn't include the node_modules & vendors here</li>
    <li> Update mysql host and credentials at .env </li>
    <li> Execute 'php artisan migrate' to create the properties table.</li>
    <li> Execute 'php artisan db:seed --class=PropertySeeder' to populate the properties table with the provided data.</li>
    <li> Run the app using 'php artisan serve', or deploy on a PHP server.</li>
</ol>

 <h2>HighLights:</h2>
 <h3>Database </h3>
 <ul>
    <li> Seeding - to prevent hardcoding the data in my code, I stored the provided csv file in the Storage directory then parse it my seeder.</li>
 </ul>
 <h3>Backend </h3>
 <ul>
    <li> 
        Although the requirement is a simple api that returns filtered data, I still structured my codes to be flexible enough to support other requirements later on.
        <br />
        Heres how I usually structure my codes when using MCV framework:
        <ul>
            <li>
                Controller - Handles the request and response only. Will only call the method in the service passing the parameters from the request. Then create the appropriate response. 
            </li>
            <li>
                Service - Handles the logic. 
            </li>
            <li>
                Repository - Handles the data only. I separate the codes for data storage and data retrieval so that my service is not attached to a specific resource library.  
            </li>
        </ul>
    </li>
    <li>
        Also I always try to follow dependency inversion. In laravel we can bind an interface to an implementation so we can configure which implementation will be injected. In the App/Repository directory, I have created Eloquent and Test implementation to demonstrate this.
    </li>
 </ul>
 
 <h3>Frontend </h3>
 <ul>
    <li> Element UI - For vuejs, I always use vuetify, but since elementUI was mentioned in the instructions, I figured I also need to study this. I used elementui for the seach form</li>
    <li> Price Range - This is the trickiest part. I want the search form to be as user friendly as posible with a simple layout. I want the price input to be the same size as the name input. Looking at the elementui components, I came up with the idea to use collapse, range slider and number-input and make a reusable vue component that can handle any numeric range input. Check the NumericRangeInput.vue
    </li>
 </ul>
 
 ![FrontendScreen](https://github.com/bryvictoria/real-estate-property/blob/main/public/img/frontend-screen.png?raw=true)
