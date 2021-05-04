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
        Although the requirement is a simple api that returns filtered data, I still structured my codes to be flexible enough to support other requirement later on.
        <br />
        Heres how I usually structure my codes when using MCV framework:
        <ul>
            <li>
                Controller - Handles the request and response only. 
            </li>
            <li>
                Service - Handles the logic. 
            </li>
            <li>
                Repository - Handles the data only. I separate the codes for data storage and retrieval so that my service is not attached to a specific resource library.  
            </li>
        </ul>
    </li>
    <li>
        Also I always try to follow dependency inversion. In laravel we can use Service Provider in binding an interface to an implementation. In the repository directory, I have created eloquent and test implementation to demonstrate this.
    </li>
 </ul>
 
 <h3>Frontend </h3>
 <ul>
    <li> Element UI - For vuejs, I always use vuetify, but since elementUI was mentioned in the instructions, I figured I need to study this.</li>
    <li> Price Range - This is the trickiest part. I want the search form to be as user friendly as posible with a simple layout. I want the price input to be the same size as the name input. Looking at the elementui components, I came up with the idea to use collapse, range slider and number-input and make a reusable vue component that can handle any numeric range input. Check the NumericRangeInput.vue
    </li>
 </ul>
 
 ![FrontendScreen](https://github.com/bryvictoria/real-estate-property/blob/main/public/img/frontend-screen.png?raw=true)
