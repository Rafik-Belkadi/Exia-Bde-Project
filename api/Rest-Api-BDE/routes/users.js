const errors = require('restify-errors');
const User = require('../models/User');
const bcrypt = require('bcryptjs');
const auth = require('../auth');
const jwt = require('jsonwebtoken');
const config = require('../config');

module.exports = server => {
    // Register User
    server.post('/register', (req,res,next) =>{

        const { email, password, centre} = req.body;

        const user = new User({
            email,
            password,
            centre
        });

        bcrypt.genSalt(10, (err,salt) => {
            bcrypt.hash(user.password, salt, async (err, hash) => {
                // Hash password
                user.password = hash;
                // Save the user
                try {
                    const newUser = await user.save();
                    res.send(201);
                    next();
                } catch (err) {
                    return next(new errors.InternalError(err.message));
                }
            });
        });
    });

    // Auth User
    server.post('/auth', async (req,res,next) => {
        const { email,password } = req.body;

        try {
            // Authenticate user
            const user = await auth.authenticate(email,password);
            
            // Create JWT
            const token = jwt.sign(user.toJSON(),config.JWT_SECRET,{
                expiresIn: '15m'
            });

            const { iat, exp } = jwt.decode(token);
            // Respond with
            res.send({ iat, exp, token});

            next();
        } catch (err) {
            // User unauthorized
            return next(new errors.UnauthorizedError(err.message));
        }
    });


    // Get All users
    server.get('/users', async (req, res, next) => {

        try {
            const user = await User.find()
            res.send(user);
            next();

        } catch (err) {
            return next(new errors.InvalidContentError(err));
        }

    });
    // Get single user
    server.get('/users/:id', async (req, res, next) => {

        try {
            const user = await User.findById(req.params.id);
            res.send(user);
            next();

        } catch (err) {
            return next(new errors.ResourceNotFoundError('There is no user with the id of ' + req.params.id));
        }

    });

    

    //Update a user
    server.put('/users/:id', async (req, res, next) => {
        //Check for JSOn
        if (!req.is('application/json')) {
            return next(new errors.InvalidContentError("Expects 'application/json"));
        }


        try {
            const user = await User.findOneAndUpdate({ _id: req.params.id }, req.body);
            res.send(200);
            next();
        } catch (err) {
            return next(new errors.ResourceNotFoundError('There is no user with the id of ' + req.params.id));
        }
    });

    //Delete a user
    server.del('/users/:id', async (req, res, next) => {
        //Check for JSOn
        if (!req.is('application/json')) {
            return next(new errors.InvalidContentError("Expects 'application/json"));
        }


        try {
            const user = await User.findOneAndRemove({ _id: req.params.id });
            res.send(204);
            next();
        } catch (err) {
            return next(new errors.ResourceNotFoundError('There is no user with the id of ' + req.params.id));
        }
    });

};