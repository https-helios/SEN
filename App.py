from flask import Flask, render_template, request, jsonify
import psycopg2
import psycopg2.extras

app = Flask(__name__)

app.secret_key = "caircocoders-ednalan"

DB_HOST="localhost"
DB_NAME="sen"
DB_USER="zeb"
DB_PASS="3303832"

conn = psycopg2.connect(dbname=DB_NAME, user=DB_USER, password=DB_PASS, host=DB_HOST)

@app.route('/')
def index():
    cur = conn.cursor(cursor_factory=psycopg2.extras.DictCursor)
    cur.execute('SELECT * FROM "SEN"."tblStudent" ORDER BY StudentID')
    carbrands = cur.fetchall()
    return render_template('index.html', tblStudent=tblStudent)

@app.route("/get_child_categories",methods=["POST","GET"])
def get_child_categories():
    if request.method == 'POST':
        parent_id = request.form['parent_id']
        print(parent_id)
    return jsonify(parent_id)    

if __name__ == "__main__":
    app.run(debug=True)