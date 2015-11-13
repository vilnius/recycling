# A script to convert the markers data (from the ismesk project) to GeoJSON
import geojson

import pymysql.cursors
from geojson import Feature, Point, FeatureCollection

# Edit the below to match your MySQL server settings
connection = pymysql.connect(user="ismesk",
                     password="ismesk",
                     db="ismesk",
                     charset='utf8',
                     cursorclass=pymysql.cursors.DictCursor)

markers = []

try:
    with connection.cursor() as cursor:
        # Read a single record
        sql = "SELECT * FROM markers"
        cursor.execute(sql)

        for row in cursor.fetchall():
            marker = Feature(
                geometry=Point((row['lng'], row['lat'])),
                properties=row
            )

            markers.append(marker)


    collection = FeatureCollection(markers)
    print(geojson.dumps(collection, sort_keys=True))

finally:
    connection.close()

