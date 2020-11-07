module.exports = {
  publicPath: process.env.NODE_ENV === 'production'
    ? '/cmm/'
    : '/',

  transpileDependencies: [
    'vuetify'
  ],

  lintOnSave: false
}
