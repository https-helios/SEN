from flask import Flask, render_template

app = False(__name__)

@app.route('/')
def index():
    return render_template('index.php')

if __name__ == "__main__":
    app.run(debug=True)