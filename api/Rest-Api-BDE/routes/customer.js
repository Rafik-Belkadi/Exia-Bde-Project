const errors = require('restify-errors');
const Customer = require('../models/Customer');

module.exports = server => {
    server.get('/customers', async (req, res, next) => {
        
        try{
            const customers = await Customer.find()
            res.send(customers);
            next();

        }catch(err){
             return next(new errors.InvalidContentError(err));
        }
        
    });
    // Get single customer
    server.get('/customers/:id', async (req, res, next) => {

        try {
            const customer = await Customer.findById(req.params.id);
            res.send(customer);
            next();

        } catch (err) {
            return next(new errors.ResourceNotFoundError('There is no customer with the id of ' + req.params.id));
        }

    });

    // Add a customer
    server.post('/customers', async (req,res,next) => {
       //Check for JSOn
       if(!req.is('application/json')){
           return next(new errors.InvalidContentError("Expects 'application/json"));
       }

       const { name, email, centre} = req.body;
       
       const customer = new Customer({
           name,
           email,
           centre
       });

       try{
            const newCustomer = await customer.save();
            res.send(201);
            next();
       } catch(err){
            return next(new errors.InternalError(err.message));
       }
    });

    //Update a customer
    server.put('/customers/:id', async (req, res, next) => {
        //Check for JSOn
        if (!req.is('application/json')) {
            return next(new errors.InvalidContentError("Expects 'application/json"));
        }

    
        try {
            const customer = await Customer.findOneAndUpdate({ _id: req.params.id}, req.body);
            res.send(200);
            next();
        } catch (err) {
            return next(new errors.ResourceNotFoundError('There is no customer with the id of ' + req.params.id));
        }
    });

    //Delete a customer
    server.del('/customers/:id', async (req, res, next) => {
        //Check for JSOn
        if (!req.is('application/json')) {
            return next(new errors.InvalidContentError("Expects 'application/json"));
        }


        try {
            const customer = await Customer.findOneAndRemove({ _id: req.params.id });
            res.send(204);
            next();
        } catch (err) {
            return next(new errors.ResourceNotFoundError('There is no customer with the id of ' + req.params.id));
        }
    });
}