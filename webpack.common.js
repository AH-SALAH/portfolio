const   webpack = require('webpack'),
        path = require('path'),
        HtmlWebpackPlugin = require('html-webpack-plugin'),
        CleanWebpackPlugin = require('clean-webpack-plugin');
    
module.exports = {
    entry: {
        main: path.resolve(__dirname,'./src/assets/js/main.js'),
        // about: path.resolve(__dirname,'./src/assets/js/about.js'),
    },
    output:{
        path: path.resolve(__dirname, 'dist'),
        filename: 'js/front.[name].[hash].js',
        // publicPath: 'dist'
    },
    module:{
        rules: [
            {
                test:/\.js$/,
                use:{
                    loader:'babel-loader'
                },
                exclude: /node_modules/
            },
            {
                test:/\.(jpe?g|png|gif|svg)$/i,
                use:{
                    loader:'file-loader',
                    options: {
                        name: '[name].[ext]',
                        // publicPath: 'dist/img',
                        outputPath: 'img/'
                    }
                },
                exclude: /node_modules|tile\.png|tile-wide\.png|^(fa-)*(.*?)\.(svg)$/
            },
            {
                test: /\.(woff(2)?|ttf|eot)(?=\?[A-Za-z0-9])?$|^(fa-)*(.*?)\.(svg)$/i, //(\?v=\d+\.\d+\.\d+)?
                use: [{
                    loader: 'file-loader',
                    options: {
                        name: '[name].[hash].[ext]',
                        // publicPath: 'dist/fonts',
                        outputPath: 'fonts/'
                    }
                }],
                exclude: /node_modules/
            },
            {
                test: /(\.(ico|txt|xml|htaccess|webmanifest)?$|(tile\.png|tile-wide\.png))/i,
                use: [{
                    loader: 'file-loader',
                    options: {
                        name: '[name].[ext]',
                        publicPath: 'dist/',
                        // outputPath: 'dist/'
                    },
                }],
                exclude: /node_modules/
            }
            // {
            //     test:/\.html$/,
            //     use:{
            //         loader:'file-loader',
            //         options: {
            //             name: '[name].[ext]',
            //             publicPath: 'dist/',
            //         }
            //     },
            //     exclude: path.resolve(__dirname,'src/index.html')
            // },
            // {
            //     test: /\.html$/,
            //     use: [ 
            //         'file-loader?name=[name].[ext]',
            //         'extract-loader',
            //         {
            //             loader:'html-loader',
            //             options: {
            //                 minimize: true,
            //                 conservativeCollapse:false,
            //             }
            //         } 
            //     ],
            //     exclude: path.resolve(__dirname,'src/index.html')
            // }
        ]
    },
    plugins: [
        new webpack.ProvidePlugin({
            '$':'jquery',
            'jQuery':'jquery',
            'window.jQuery':'jquery'
        }),
        new CleanWebpackPlugin('dist',{}),
        new HtmlWebpackPlugin({
            title: 'Portfolio',
            filename: 'index.html',
            template: './src/index.html',
            minify: {
                collapseWhitespace:true,
                // conservativeCollapse:true,
                collapseInlineTagWhitespace:true,
                // preserveLineBreaks:true,
                caseSensitive:true,
            },
            hash: true,
            // favicon: path.resolve(__dirname,'./src/assets/img/icon.png'),
            meta: {
                description: 'Portfolio',
                viewport: 'width=device-width, initial-scale=1, shrink-to-fit=no',
                keywords: 'portfolio,tech',
                author: 'Ahmed Salah',
                'application-name': 'Portfolio', //Name of web app (only should be used if the website is used as an app)
                'theme-color': '#4285f4', //Theme Color for Chrome, Firefox OS and Opera
                robots: 'index,follow', //All search engine crawling and indexing
            },
            chunks: ['main'],
            // excludeChunks: ['contact'],
        }),
        // new HtmlWebpackPlugin({
        //     title: 'About page',
        //     filename: 'about.html',
        //     template: './src/about.html',
        //     minify: {
        //         collapseWhitespace:true,
        //         // conservativeCollapse:true,
        //         collapseInlineTagWhitespace:true,
        //         // preserveLineBreaks:true,
        //         caseSensitive:true,
        //     },
        //     hash: true,
        //     // favicon: path.resolve(__dirname,'./src/assets/img/icon.png'),
        //     meta: {
        //         description: 'Portfolio',
        //         viewport: 'width=device-width, initial-scale=1, shrink-to-fit=no',
        //         keywords: 'portfolio,tech',
        //         author: 'Ahmed Salah',
        //         'application-name': 'Portfolio', //Name of web app (only should be used if the website is used as an app)
        //         'theme-color': '#4285f4', //Theme Color for Chrome, Firefox OS and Opera
        //         robots: 'index,follow', //All search engine crawling and indexing
        //     },
        //     chunks: ['about']
        // }),
        new HtmlWebpackPlugin({
            title: '404 page',
            filename: '404.html',
            template: './src/404.html',
            minify: {
                collapseWhitespace:true,
                // conservativeCollapse:true,
                collapseInlineTagWhitespace:true,
                // preserveLineBreaks:true,
                caseSensitive:true,
            },
            hash: true,
            // favicon: path.resolve(__dirname,'./src/assets/img/icon.png'),
            meta: {
                description: 'Portfolio',
                viewport: 'width=device-width, initial-scale=1, shrink-to-fit=no',
                keywords: 'portfolio,tech',
                author: 'Ahmed Salah',
                'application-name': 'Portfolio', //Name of web app (only should be used if the website is used as an app)
                'theme-color': '#4285f4', //Theme Color for Chrome, Firefox OS and Opera
                robots: 'index,follow', //All search engine crawling and indexing
            },
            chunks: ['']
        }),

    ],
};