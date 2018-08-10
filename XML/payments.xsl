<?xml version="1.0" encoding="UTF-8"?>

<!--
    Document   : payments.xsl
    Created on : August 10, 2018, 9:14 PM
    Author     : William
    Description:
        Purpose of transformation follows.
-->

<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
    <xsl:output method="html"/>

    <!-- TODO customize transformation rules 
         syntax recommendation http://www.w3.org/TR/xslt 
    -->
    <xsl:template match="/">
        <html>
            <head>
                <title>Payment List</title>
            </head>
            <body>
                <h1>Payment List</h1>
                <hr/>
                <table border="1">
                    <tr bgcolor="#bdfbff">
                        <th>No</th>
                        <th>Order and Invoice ID</th>
                        <th>Date and Time</th>
                    </tr>
                    <xsl:for-each select="payments/payment">
                        <tr>
                            <td>
                                <xsl:value-of select="position()"/>
                            </td>
                            <td>
                                <xsl:value-of select="paymentOrderInvID"/>
                            </td>
                            <td>
                                <xsl:value-of select="paymentDateTime"/>
                            </td>
                        </tr>
                    </xsl:for-each>
                </table>
            </body>
        </html>
    </xsl:template>

</xsl:stylesheet>
