var ImageminPlugin = require('imagemin-webpack-plugin').default
const imageminMozjpeg = require('imagemin-mozjpeg');
const CopyWebpackPlugin = require('copy-webpack-plugin');
const imageminSvgo = require('imagemin-svgo');
const imageminPngQuant = require('imagemin-pngquant');

const path = require('path');

module.exports = {
    mode: "development",
    context: path.resolve(__dirname, "assets"),
    output: {
        filename: 'main.bundle.js',
        path: path.resolve(__dirname, "assets/dist"),
    },
    watch: true,
    module: {
        rules: [
            {
                test: /\.js$/,
                exclude: /node_modules/,
                use: {
                    loader: 'babel-loader',
                }
            }
        ]
    },
    plugins: [
        new CopyWebpackPlugin({
            patterns: [
                {
                    from: path.resolve(__dirname, "assets/src/img"),
                    to: path.resolve(__dirname, "assets/dist/img")
                }
            ]
        }),
        new ImageminPlugin({
            test: /\.(jpe?g|png|gif|svg)$/i,
            plugins: [
                imageminPngQuant({ quality: [0.8, 0.9] }),
                imageminMozjpeg({
                    quality: 60,
                    progressive: true
                }),
                imageminSvgo({
                    plugins: [
                        { removeViewBox: false }
                    ]
                })
            ]
        })
    ]
};